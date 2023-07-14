document.addEventListener('DOMContentLoaded', function() {
    const seats = document.querySelectorAll('.seat');
    const selectedSeats = [];
    let quantity = 0;

    seats.forEach(seat => {
        seat.addEventListener('click', function() {
            if (this.classList.contains('booked')) {
                alert("This seat is already selected");
                return;
            }

            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                quantity--;
                const index = selectedSeats.indexOf(seat.getAttribute('value'));
                if (index > -1) {
                    selectedSeats.splice(index, 1);
                }
            } else {
                if (quantity < 6) {
                    this.classList.add('selected');
                    quantity++;
                    selectedSeats.push(seat.getAttribute('value'));
                }
                else{
                    alert('You can select a maximum of 6 seats');
                }
            }

            document.getElementById('array').value = selectedSeats.join(',');
            document.getElementById('quantity').value = quantity;
        });
    });
});
