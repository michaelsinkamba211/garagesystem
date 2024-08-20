function showContent(event, sectionId) {
  event.preventDefault();

  // Hide all content sections
  var contentSections = document.querySelectorAll(".content-section");
  contentSections.forEach(function (section) {
    section.classList.remove("active");
  });

  // Show the selected content section
  var selectedSection = document.getElementById(sectionId);
  selectedSection.classList.add("active");

  // Remove 'active' class from all links
  var links = document.querySelectorAll("nav a");
  links.forEach(function (link) {
    link.classList.remove("active");
  });

  // Add 'active' class to the clicked link
  event.target.classList.add("active");
}





// buying directly


document.querySelectorAll('.view_more_button').forEach(button => {
  button.addEventListener('click', function () {
      const productDesc = this.closest('.product_desc');
      const productDetails = productDesc.querySelector('.product_properties').cloneNode(true);

      // Fetch the model name
      const productModel = productDesc.querySelector('.product_model').textContent;

      // Get the product image source
      const productImageSrc = productDesc.closest('.products_contents').querySelector('.product_image_src').src;

      // Display hidden features
      productDetails.querySelectorAll('.hidden_features').forEach(hidden => hidden.classList.remove('d-none'));

      // Remove the "View More Properties" button
      const viewMoreButton = productDetails.querySelector('.view_more_button');
      if (viewMoreButton) {
          viewMoreButton.remove();
      }
      const buydirect = productDetails.querySelector('.buy_directly');
      if (buydirect) {
          buydirect.remove();
      }

      // Insert product details into the modal
      document.getElementById('productModalLabel').innerText = productModel;
      document.getElementById('modal_product_image').src = productImageSrc;

      const modalBody = document.getElementById('modal_product_details');
      modalBody.innerHTML = ''; // Clear previous content
      modalBody.appendChild(productDetails); // Append new product details

      // Set up the "Buy This Item" button in the modal
      const buyButton = document.getElementById('buy_button');
      buyButton.onclick = function () {
          const productDetailsText = `I want this item\n\nModel: ${productModel}\n` + Array.from(productDetails.querySelectorAll('p')).map(p => p.textContent).join('\n');
          const whatsappUrl = `https://wa.me/260960108064?text=${encodeURIComponent(productDetailsText)}`;
          window.open(whatsappUrl, '_blank');
      };
  });
});



// Set up the "Buy Directly" button
document.querySelectorAll('#buy_directly').forEach(button => {
  button.addEventListener('click', function () {
      const productDesc = this.closest('.product_desc');
      const productModel = productDesc.querySelector('.product_model').textContent;
      const productDetails = productDesc.querySelector('.product_properties').innerText;

      const productDetailsText = `I want this item\n\nModel: ${productModel}\n${productDetails}`;
      const whatsappUrl = `https://wa.me/260960108064?text=${encodeURIComponent(productDetailsText)}`;
      window.open(whatsappUrl, '_blank');
  });
});


