let currentLanguage = "en"; // Initialize the current language
// console.log("before" + currentLanguage);
// Function to update the language on the page
function updateLanguage(translations) {
    for (let [key, subTranslations] of Object.entries(translations)) {
        // for (let [subKey, value] of Object.entries(subTranslations)) {
        // console.log(subkey);

        let element = document.getElementById(key);
        if (element) {
            // console.log(key);
            // console.log(translations[key]);
            element.textContent = translations[key];
        }
    }
}

// }
let xhr = new XMLHttpRequest();
xhr.open('GET', '../auth/languages.json', true);
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);
        let select = document.getElementById("language-select");
        select.addEventListener("change", function () {
            currentLanguage = select.value;
            console.log("afther" + currentLanguage);
            console.log(data[currentLanguage]);
            updateLanguage(data[currentLanguage]);
        });
    }
};
xhr.send();

updateLanguage(data[currentLanguage]);

