const cardNumber = document.getElementById('card_number');
const previewCardNumber = document.querySelector('.preview_card_number');
const expiryDate = document.getElementById('expiry_date');
const previewExpiryDate = document.getElementById('preview_expiry_date');
const cardTypeImg = document.getElementById('card_type_img');
const cardTypeSelect = document.getElementById('card_type');

function generateCardNumber() {
    let digits = '0123456789';
    let card = '';

    for (let i = 0; i < 16; i++) {
        card += digits[Math.floor(Math.random() * 10)];
        if ((i + 1) % 4 === 0 && i !== 15) {
            card += ' ';
        }
    }
    // Card Preview
    if (previewCardNumber) {
        previewCardNumber.innerHTML = card;
    }

    // Card number
    if (cardNumber) {
        cardNumber.value = card;
    }

    // Expiry date
    function setExpiryDate() {
        const today = new Date();
        const twoYearsLater = new Date(today.getFullYear() + 2, today.getMonth());

        // Format MM/YY
        let month = String(twoYearsLater.getMonth() + 1).padStart(2, '0');
        let year = String(twoYearsLater.getFullYear()).slice(-2);

        const expiry = `${month}/${year}`;
        // previewExpiryDate
        if (previewExpiryDate) {
            previewExpiryDate.innerHTML = expiry;
        }
        // Form Expiry
        if (expiryDate) {
            expiryDate.value = expiry;
        }
    }
    setExpiryDate();

    function changeCardLogo() {
        let imgLogo = "";

        const selectedType = cardTypeSelect ? cardTypeSelect.value : '';

        if (selectedType === 'Visa') {
            imgLogo = '/assets/img/logos/visa2.png';
        } else if (selectedType === 'Mastercard') {
            imgLogo = '/assets/img/logos/mastercard.png';
        } else if (selectedType === 'Verve') {
            imgLogo = '/assets/img/logos/verve.png';
        } else if (selectedType === 'Discover') {
            imgLogo = '/assets/img/logos/discover.png';
        } else if (selectedType === 'American Express') {
            imgLogo = '/assets/img/logos/american_express.png';
        }

        if (cardTypeImg && imgLogo) {
            cardTypeImg.src = imgLogo;
        }
    }
    changeCardLogo();
}

if (cardTypeSelect) {
    cardTypeSelect.addEventListener('change', generateCardNumber);
}

// Call on page load to set initial state
document.addEventListener('DOMContentLoaded', function () {
    generateCardNumber();
});
