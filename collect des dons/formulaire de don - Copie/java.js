function updateAmount() {
    var range = document.getElementById('amount-range');
    var amountDisplay = document.getElementById('selected-amount');
    amountDisplay.textContent = range.value + '€';
}

function selectDonationType(type) {
    // Additional logic for handling donation type
}

function confirmDonation() {
    // Additional logic for confirming donation
}

function submitDonation() {
    // Additional logic for submitting donation form
}


function selectDonationType(type) {
    if (type === 'ponctuel') {
        // Désélectionner l'autre type si celui-ci est sélectionné
        document.getElementById('donation-mensuel').checked = false;
    } else if (type === 'mensuel') {
        // Désélectionner l'autre type si celui-ci est sélectionné
        document.getElementById('donation-ponctuel').checked = false;
    }
}



function confirmDonation() {
    // Récupérer les valeurs des champs
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var amount = document.getElementById('amount').value;
    var cardType = document.getElementById('card-type').value;
    var cardNumber = document.getElementById('card-number').value;
    var expiryDate = document.getElementById('expiry-date').value;
    var cvv = document.getElementById('cvv').value;

    // Validation simple des champs (vous pouvez ajouter une logique plus complexe ici)
    if (!name || !email || !amount || !cardType || !cardNumber || !expiryDate || !cvv) {
        alert('Veuillez remplir tous les champs.');
        return;
    }

    // Envoyer les données à votre backend pour traitement (par exemple, via une requête AJAX)
    // Ici, vous pouvez ajouter du code pour envoyer les données au serveur
    // Par exemple :
    // var formData = { name, email, amount, cardType, cardNumber, expiryDate, cvv };
    // fetch('url_de_votre_api', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify(formData),
    // })
    // .then(response => {
    //     if (response.ok) {
    //         alert('Don confirmé ! Merci pour votre générosité.');
    //     } else {
    //         throw new Error('Erreur lors de la confirmation du don.');
    //     }
    // })
    // .catch(error => {
    //     alert('Une erreur est survenue. Veuillez réessayer plus tard.');
    // });
    
    // Exemple de message d'alerte (à remplacer par votre logique de gestion de don)
    alert('Don confirmé ! Merci pour votre générosité.');
}
