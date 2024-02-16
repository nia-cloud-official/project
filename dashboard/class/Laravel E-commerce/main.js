// script.js
const videoData = [
  {
      title: 'Introduction to Laravel',
      url: './Introduction.mp4',
  },
  {
      title: 'Advantages & Disadvantages',
      url: './002.mp4',
  },
  // Add more video objects as needed
];

const videoGallery = document.querySelector('.video-gallery');
let currentVideoIndex = 0;

function playNextVideo() {
  if (currentVideoIndex < videoData.length) {
      const video = videoData[currentVideoIndex];
      const videoThumbnail = document.createElement('div');
      videoThumbnail.classList.add('video-thumbnail');
      videoThumbnail.innerHTML = `
          <video controls>
              <source src="${video.url}" controls autoplay type="video/mp4">
              Your browser does not support the video tag.
          </video>
          <p>${video.title}</p>
      `;

      const videoElement = videoThumbnail.querySelector('video');
      videoElement.addEventListener('ended', () => {
          currentVideoIndex++;
          playNextVideo();
      });

      videoGallery.appendChild(videoThumbnail);
  }
}

// Start playing the first video
playNextVideo();
