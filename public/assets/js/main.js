// filepath: /computer-asset-management/computer-asset-management/public/assets/js/main.js

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips for Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Dynamic updates for computer status
    function updateComputerStatus() {
        fetch('/api/computer-status')
            .then(response => response.json())
            .then(data => {
                const statusContainer = document.getElementById('computer-status');
                statusContainer.innerHTML = '';

                data.forEach(computer => {
                    const statusElement = document.createElement('div');
                    statusElement.className = 'status-item';
                    statusElement.innerHTML = `
                        <strong>${computer.name}</strong>: ${computer.status} 
                        <span class="badge bg-${computer.status === 'Active' ? 'success' : 'danger'}">${computer.status}</span>
                    `;
                    statusContainer.appendChild(statusElement);
                });
            })
            .catch(error => console.error('Error fetching computer status:', error));
    }

    // Search functionality
    const searchInput = document.getElementById('search-input');
    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        const assetItems = document.querySelectorAll('.asset-item');

        assetItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(query) ? '' : 'none';
        });
    });

    // Initial load
    updateComputerStatus();
});