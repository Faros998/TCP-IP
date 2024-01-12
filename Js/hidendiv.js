const toggleButton = document.getElementById('toggleButton');
const hiddenDiv = document.getElementById('hiddenDiv');

let isHidden = true;

toggleButton.addEventListener('click', () => {
  if (isHidden) {
    hiddenDiv.style.display = 'block';
    isHidden = false;
  } else {
    hiddenDiv.style.display = 'none';
    isHidden = true;
  }
});
