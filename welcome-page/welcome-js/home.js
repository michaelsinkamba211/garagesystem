

document.addEventListener("DOMContentLoaded", function () {
  const titles = [
    'Boost Your Work with Our <span>High-Performance Laptops</span>',
    'Enjoy Top-Notch Sound <span>With Our AirPods</span>',
    'Earn with Our <span>Refer and Earn Program</span>',
  ];

  const subheadings = [
    'Power up your productivity and gaming.',
    'Superior sound quality and comfort await.',
    'Get a K100 reward for every successful referral.',
  ];

  const links = [
    'Explore Laptops',
    'Shop AirPods',
    'Start Referring',
  ];

  const backgrounds = [
    'welcome-images/laptophomeimage1.jpg',
    'welcome-images/airpodsimage.jpg',
    'welcome-images/homeimage2.jpg',
  ];


  let currentIndex = 0;

  function updateContent() {
    // Update content
    document.getElementById('dynamicTitle').innerHTML = titles[currentIndex];
    document.getElementById('dynamicSubheading').innerHTML = subheadings[currentIndex];
    document.getElementById('dynamicLink').innerHTML = links[currentIndex];


    // Update background
    document.querySelector('.home').style.backgroundImage = `url(${backgrounds[currentIndex]})`;
  }

  function changeContent() {
    // Fade out
    document.getElementById('dynamicTitle').classList.add('fade');
    document.getElementById('dynamicSubheading').classList.add('fade');
    document.getElementById('dynamicLink').classList.add('fade');

    setTimeout(() => {
      currentIndex = (currentIndex + 1) % titles.length;

      // Update content and background
      updateContent();

      // Fade in
      document.getElementById('dynamicTitle').classList.remove('fade');
      document.getElementById('dynamicSubheading').classList.remove('fade');
      document.getElementById('dynamicLink').classList.remove('fade');
    }, 500);
  }

  updateContent();

  setInterval(changeContent, 5000); // Change every 5 seconds
});
