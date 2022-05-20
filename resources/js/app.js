require('./bootstrap');

const btn = document.querySelector(".btn-submit");

btn.addEventListener("click", function (e) {
    e.preventDefault();

    const link     = document.querySelector(".store-link");
    const blockResponse = document.querySelector(".store-response");

    axios.post('/store', {
        link: link.value
    })
    .then(function (response) {
        blockResponse.innerHTML = `<a href="${response.data.link}" style="color: blue; text-decoration: underline">${response.data.short}</a>`;
    })
    .catch(function (error) {
        blockResponse.innerHTML = error.response.data.message;
    });
});
