document.addEventListener("DOMContentLoaded", () => {
  const video = document.querySelector(".hero__video")
  if (!video) return

  // autoplay próbálkozás
  const playPromise = video.play()
  if (playPromise !== undefined) {
    playPromise.catch(() => {
      video.pause()
    })
  }

  // kattintásra play / pause
  const hero = document.querySelector(".hero")
  if (hero) {
    hero.addEventListener("click", () => {
      if (video.paused) {
        video.play()
      } else {
        video.pause()
      }
    })
  }

  // 🔹 PERFORMANCE: ha nincs képernyőn, álljon le
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          video.play()
        } else {
          video.pause()
        }
      },
      { threshold: 0.2 }
    )

    observer.observe(video)
  }
})
