const sponsorshipSelect = document.getElementById('sponsorship_id');
const priceDisplay = document.getElementById('amount-display');
const periodDisplay = document.getElementById('period-display');

// when the selected sponsor change
sponsorshipSelect.addEventListener('change', function() {
    const selectedOption = sponsorshipSelect.options[sponsorshipSelect.selectedIndex];
    const selectedPrice = selectedOption.getAttribute('data-price');
    const selectedPeriod = selectedOption.getAttribute('data-period');
    priceDisplay.textContent = selectedPrice;
    periodDisplay.textContent = selectedPeriod;
});

document.addEventListener('DOMContentLoaded', getImport())

function getImport(){
    const selectedOption = sponsorshipSelect.options[sponsorshipSelect.selectedIndex];
    const selectedPrice = selectedOption.getAttribute('data-price');
    const selectedPeriod = selectedOption.getAttribute('data-period');
    priceDisplay.textContent = selectedPrice;
    periodDisplay.textContent = selectedPeriod;
}
