document.addEventListener('DOMContentLoaded', function() {
    const foundationGrid = document.querySelector('.foundation-grid');
    const concealerGrid = document.querySelector('.concealer-grid');
    const contourGrid = document.querySelector('.contour-grid');
    const blushGrid = document.querySelector('.blush-grid');
    const highlighterGrid = document.querySelector('.highlighter-grid');

    const foundationItemsGrid = document.querySelector('.foundation-grid .items-grid');
    const concealerItemsGrid = document.querySelector('.concealer-grid .items-grid');
    const contourItemsGrid = document.querySelector('.contour-grid .items-grid');
    const blushItemsGrid = document.querySelector('.blush-grid .items-grid');
    const highlighterItemsGrid = document.querySelector('.highlighter-grid .items-grid');

    const searchIcon = document.getElementById('icon-search');
    const searchFormContainer = document.getElementById('search-form-container');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');

    let items = [];

    searchIcon.addEventListener('click', function() {
        searchFormContainer.style.display = 'block';
        searchInput.focus();
    });

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const query = searchInput.value.toLowerCase();
        performSearch(query);
    });

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
        foundationItemsGrid.innerHTML = ''; 
        concealerItemsGrid.innerHTML = ''; 
        contourItemsGrid.innerHTML = '';
        blushItemsGrid.innerHTML = '';
        highlighterItemsGrid.innerHTML = '';

        for (const item of items) {
            let itemElement = createItemElement(item);
            appendItemToGrid(itemElement, item.type);
        }
    }

    function createItemElement(item) {
        let itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.dataset.id = item.id;
        itemElement.dataset.type = item.type;
        itemElement.innerHTML = `
            <div class="image-container">
                <img src="${item.image}" alt="${item.name}" class="image-item">
                <a href="#" class="icon-heart"><i class="bi bi-heart"></i></a>
            </div>
            <h5 class="name-item">${item.name}</h5>
            <p class="description-item">${item.description}</p>
            <button class="add-to-cart-btn" data-id="${item.id}">add to cart - <span class="price-item">$${item.price}</span></button>
        `;
        return itemElement;
    }

    function appendItemToGrid(itemElement, type) {
        if (type === 'Foundation') {
            foundationItemsGrid.appendChild(itemElement);
        } else if (type === 'Concealer') {
            concealerItemsGrid.appendChild(itemElement);
        } else if (type === 'Contour') {
            contourItemsGrid.appendChild(itemElement);
        } else if (type === 'Blush') {
            blushItemsGrid.appendChild(itemElement);
        } else if (type === 'Highlighter') {
            highlighterItemsGrid.appendChild(itemElement);
        }
    }

    function performSearch(query) {
        const filteredItems = items.filter(item => 
            item.name.toLowerCase().includes(query) ||
            item.description.toLowerCase().includes(query)
        );

        foundationGrid.style.display = 'none';
        concealerGrid.style.display = 'none';
        contourGrid.style.display = 'none';
        blushGrid.style.display = 'none';
        highlighterGrid.style.display = 'none';

        foundationItemsGrid.innerHTML = ''; 
        concealerItemsGrid.innerHTML = ''; 
        contourItemsGrid.innerHTML = '';
        blushItemsGrid.innerHTML = '';
        highlighterItemsGrid.innerHTML = '';

        let firstMatchedElement = null;

        for (const item of filteredItems) {
            let itemElement = createItemElement(item);
            appendItemToGrid(itemElement, item.type);

            if (!firstMatchedElement) {
                firstMatchedElement = itemElement;
                if (item.type === 'Foundation') {
                    foundationGrid.style.display = 'block';
                } else if (item.type === 'Concealer') {
                    concealerGrid.style.display = 'block';
                } else if (item.type === 'Contour') {
                    contourGrid.style.display = 'block';
                } else if (item.type === 'Blush') {
                    blushGrid.style.display = 'block';
                } else if (item.type === 'Highlighter') {
                    highlighterGrid.style.display = 'block';
                }
            }
        }

        // Scroll to the first matched item
        if (firstMatchedElement) {
            firstMatchedElement.scrollIntoView({ behavior: 'smooth' });
        }
    }

    fetchItems();
});
