  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    let openFunction = document.querySelector(`.mainbox`);
    let openClick = document.querySelector(`#menu`);
    let closeFunction = document.querySelector(`.closebtn`);

    openFunction.addEventListener(`click`, () => {
      openClick.style.width = `300px`;
      openFunction.style.marginLeft = `300px`;
      openFunction.innerHTML = ``;
    });

    closeFunction.addEventListener(`click`, () => {
      openClick.style.width = `0px`;
      openFunction.style.marginLeft = `0px`;
      openFunction.innerHTML = `&#9776;`;
    });
  </script>
  </body>
</html>