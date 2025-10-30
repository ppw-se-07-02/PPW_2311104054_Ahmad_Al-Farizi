$(document).ready(function() {
    const products = [
        { id: 1, name: 'Laptop Pro', price: 'Rp 15.000.000', description: 'Laptop high-end untuk profesional.', images: ['assets/img/laptop1.png', 'assets/img/laptop2.png'] },
        { id: 2, name: 'Mouse Gaming', price: 'Rp 750.000', description: 'Mouse ergonomis dengan DPI tinggi.', images: ['assets/img/mouse1.png', 'assets/img/mouse2.png'] },
        { id: 3, name: 'Keyboard Mekanik', price: 'Rp 1.200.000', description: 'Keyboard dengan backlight RGB.', images: ['assets/img/keyboard1.png', 'assets/img/keyboard2.png'] },
        { id: 4, name: 'Monitor 4K', price: 'Rp 5.500.000', description: 'Monitor dengan warna yang akurat.', images: ['assets/img/monitor1.png', 'assets/img/monitor2.png'] },
        { id: 5, name: 'Headset Wireless', price: 'Rp 900.000', description: 'Headset dengan noise cancelling.', images: ['assets/img/headset1.png', 'assets/img/headset2.png'] },
        { id: 6, name: 'Webcam Full HD', price: 'Rp 450.000', description: 'Webcam 1080p untuk streaming.', images: ['assets/img/webcam1.png', 'assets/img/webcam2.png'] }
    ];

    function resolveImagePath(path) {
        if (!path) return null;
        if (path.startsWith('http://') || path.startsWith('https://')) return path;
        if (path.startsWith('assets/img/')) return path;
        return `assets/img/${path}`;
    }

    function showNotification(message) {
        const notification = $('#notification');
        notification.text(message);
        notification.addClass('show');
        setTimeout(() => { notification.removeClass('show'); }, 3000);
    }

    function createProductCard(product) {
        const firstImage = resolveImagePath(product.images && product.images[0]);
        const imgSrc = firstImage || `https://placehold.co/400x300?text=${encodeURIComponent(product.name)}`;
        return `
            <div class="col-12 col-sm-6"> <!-- Card di dalam grid 2 kolom -->
                <div class="card h-100">
                    <img src="${imgSrc}" class="card-img-top" alt="${product.name}">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">${product.name}</h5>
                        <a href="detail.html?id=${product.id}" class="btn btn-primary mt-2">Detail</a>
                    </div>
                </div>
            </div>
        `;
    }

    if ($('#recommended-grid').length) {
        function displayProducts(targetGrid, productsToShow) {
            const grid = $(targetGrid);
            grid.empty();
            productsToShow.forEach(product => {
                grid.append(createProductCard(product));
            });
        }

        const recommendedProducts = products.slice(0, 2);
        const otherProducts = products.slice(2);

        displayProducts('#recommended-grid', recommendedProducts);
        displayProducts('#other-products-grid', otherProducts);

        $('#searchInput').on('keyup', function() {
            const searchTerm = $(this).val().toLowerCase();
            const filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchTerm));

            const newRecommended = filteredProducts.slice(0, 2);
            const newOther = filteredProducts.slice(2);

            displayProducts('#recommended-grid', newRecommended);
            displayProducts('#other-products-grid', newOther);
        });
    }

    if ($('#productCarousel').length) {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = parseInt(urlParams.get('id'));
        const product = products.find(p => p.id === productId);

        if (product) {
            $('#product-name').text(product.name);
            $('#product-price').text(product.price);
            $('#product-description').text(product.description);
            const carouselInner = $('#carousel-inner');
            const imgs = (product.images && product.images.length) ? product.images : [null];
            imgs.forEach((image, index) => {
                const src = resolveImagePath(image) || `https://placehold.co/600x400?text=${encodeURIComponent(product.name)}+${index + 1}`;
                carouselInner.append(`<div class="carousel-item ${index === 0 ? 'active' : ''}"><img src="${src}" class="d-block w-100" alt="${product.name}"></div>`);
            });
            $('.add-to-cart-btn-detail').on('click', function() {
                showNotification(`${product.name} berhasil ditambahkan ke keranjang!`);
            });
        } else {
            $('body').html('<div class="container mt-5"><h1>Produk tidak ditemukan.</h1></div>');
        }
    }
});