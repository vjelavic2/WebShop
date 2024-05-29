document.addEventListener('DOMContentLoaded', function() {
  const foundationGrid = document.querySelector('.foundation-grid .items-grid');
  const concealerGrid = document.querySelector('.concealer-grid .items-grid');
  const contourGrid = document.querySelector('.contour-grid .items-grid');
  const blushGrid = document.querySelector('.blush-grid .items-grid');
  const highlighterGrid = document.querySelector('.highlighter-grid .items-grid');

  // Add other grids as necessary

  function fetchItems() {
      fetch('fetch_products.php')
          .then(response => response.json())
          .then(data => {
              items = data;
              fillItemsGrid();
          })
          .catch(error => console.error('Error fetching data:', error));
  }

  function fillItemsGrid() {
      foundationGrid.innerHTML = ''; 
      concealerGrid.innerHTML = ''; 
      contourGrid.innerHTML = '';
      blushGrid.innerHTML = '';
      highlighterGrid.innerHTML = '';

      for (const item of items) {
          let itemElement = document.createElement('div');
          itemElement.classList.add('item');
          itemElement.innerHTML = `
              <div class="image-container">
                  <img src="${item.image}" alt="${item.name}" class="image-item">
                  <a href="#" class="icon-heart"><i class="bi bi-heart"></i></a>
              </div>
              <h5 class="name-item">${item.name}</h5>
              <p class="description-item">${item.description}</p>
              <button class="add-to-cart-btn" data-id="${item.id}">add to cart - <span class="price-item">$${item.price}</span></button>
          `;

          if (item.type === 'Foundation') {
              foundationGrid.appendChild(itemElement);
          } else if (item.type === 'Concealer') {
              concealerGrid.appendChild(itemElement);
          } else if (item.type === 'Contour') {
            contourGrid.appendChild(itemElement);
          } else if (item.type === 'Blush') {
            blushGrid.appendChild(itemElement);
          } else if (item.type === 'Highlighter') {
            highlighterGrid.appendChild(itemElement);
          }
      }
  }

  fetchItems();
});
