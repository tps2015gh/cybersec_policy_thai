// REF :  https://css-tricks.com/the-simplest-ways-to-handle-html-includes/ 

fetch("./header.html")
  .then(response => {
    return response.text()
  })
  .then(data => {
    document.querySelector("#header").innerHTML = data;
  });

fetch("./footer.html")
  .then(response => {
    return response.text()
  })
  .then(data => {
    document.querySelector("#footer").innerHTML = data;
  });