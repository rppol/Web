let info;

$(document).ready(async () => {
    info = (await $.get("https://davids-restaurant.herokuapp.com/menu_items.json")).menu_items;
    
    for (const name of info.map(dish => dish.name)) {
        $("#menu").append(`<option value="${name}">${name}</option>`)
    }

    info.push({
        id: "No Data",
        short_name: "No Data",
        name: "No Data",
        description: "No Data",
        price_small: "No Data",
        price_large: "No Data",
        small_portion_name: "No Data",
        large_portion_name: "No Data"
    })
});

$("#menu").on('change', function() {
    let dish = info.find(d => d.name === this.value);

    for (const [field, value] of Object.entries(dish)) {
        $(`#${field}`).html(value);
    }
})