window.addEventListener('load', () => {
  const priceInput = document.getElementById("video-price");
  priceInput.addEventListener("input", () => {
    const inputValue = priceInput.value;

    const addTaxDom = document.getElementById("add-tax-price");
    addTaxDom.innerHTML = Math.floor(0.1 * inputValue);

    const addProfitDom = document.getElementById("profit");
    addProfitDom.innerHTML = Math.floor(inputValue - Math.floor(0.1 * inputValue));
  });
});