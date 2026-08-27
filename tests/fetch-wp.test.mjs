import assert from 'node:assert/strict';
import fs from 'node:fs';
import os from 'node:os';
import path from 'node:path';
import { test } from 'node:test';
import { fetchWp } from '../scripts/fetch-wp.js';

const valid = [{ title: 'Service', content: '<p>Service description</p>' }];

for (const [name, response] of [
  ['an empty list', () => Response.json([])],
  ['an error object returned with HTTP 200', () => Response.json({ code: 'wp_error' })],
  ['an HTTP failure', () => new Response('Unavailable', { status: 503 })],
  ['invalid JSON', () => new Response('<html>Error</html>')],
  ['a missing content field', () => Response.json([{ title: 'Service' }])],
  ['blank content', () => Response.json([{ title: 'Service', content: ' ' }])],
  ['a network failure', () => { throw new Error('Network unavailable'); }],
]) {
  test(`preserves saved content on ${name}`, async (t) => {
    const directory = fs.mkdtempSync(path.join(os.tmpdir(), '3doptika-fetch-'));
    t.after(() => fs.rmSync(directory, { recursive: true, force: true }));
    const output = path.join(directory, 'services.json');
    const original = JSON.stringify(valid);
    fs.writeFileSync(output, original);
    t.mock.method(globalThis, 'fetch', response);

    await assert.rejects(fetchWp({ name: 'Services', url: 'https://example.test', output, mapItem: item => item }));
    assert.equal(fs.readFileSync(output, 'utf8'), original);
    assert.equal(fs.existsSync(`${output}.tmp`), false);
  });
}

test('writes valid mapped content and respects per-type required fields', async (t) => {
  const directory = fs.mkdtempSync(path.join(os.tmpdir(), '3doptika-fetch-'));
  t.after(() => fs.rmSync(directory, { recursive: true, force: true }));
  const output = path.join(directory, 'data', 'faq.json');
  const fetchMock = t.mock.method(globalThis, 'fetch', () => Response.json(valid));

  await fetchWp({
    name: 'FAQ', url: 'https://example.test', output,
    mapItem: item => ({ question: item.title, answer: item.content }),
    requiredFields: ['question', 'answer'],
  });

  assert.deepEqual(JSON.parse(fs.readFileSync(output, 'utf8')), [{ question: 'Service', answer: '<p>Service description</p>' }]);
  assert.equal(fetchMock.mock.calls[0].arguments[1].signal instanceof AbortSignal, true);
  assert.equal(fs.existsSync(`${output}.tmp`), false);
});
