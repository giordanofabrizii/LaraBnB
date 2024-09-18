const sponsorshipSelect = document.getElementById('sponsorship_id');
const priceDisplay = document.getElementById('amount-display');

// when the selected sponsor change
sponsorshipSelect.addEventListener('change', function() {
    const selectedOption = sponsorshipSelect.options[sponsorshipSelect.selectedIndex];
    const selectedPrice = selectedOption.getAttribute('data-price');
    priceDisplay.textContent = selectedPrice;
});

document.addEventListener('DOMContentLoaded', getImport())

function getImport(){
    const selectedOption = sponsorshipSelect.options[sponsorshipSelect.selectedIndex];
    const selectedPrice = selectedOption.getAttribute('data-price');
    priceDisplay.textContent = selectedPrice;
}
