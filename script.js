const itemsGrid = document.querySelector('.items-grid');

let items = [
    {
      id: 1,
      name: 'White Shoes',
      price: 121.01,
      link:"../pics/f6.png",
    },
    {
      id: 2,
      name: 'Green Shoes',
      price: 99.99,
      link:"../pics/f2.png",
    },
    {
      id: 3,
      name: 'Gray Shoes',
      price: 102.54,
      link:"../pics/f3.png",
    },
    {
      id: 4,
      name: 'Purple Shirt',
      price: 34.99,
      link:"../pics/f4.png"
    },
    {
      id: 5,
      name: 'White Shirt',
      price: 54.02,
      link:"../pics/f5.png",
    },
    
  ];

  function fillItemsGrid() {
    for (const item of items) {
      let itemElement = document.createElement('div');
      itemElement.classList.add('item');
      itemElement.innerHTML = `
        <img src="${item.link}" alt="${item.name}">
        <h2>${item.name}</h2>
        <p>$${item.price}</p>
        <button class="add-to-cart-btn" data-id="${item.id}">Add to cart</button>
      `;
      itemsGrid.appendChild(itemElement);
  
      
    }
  }

  fillItemsGrid();