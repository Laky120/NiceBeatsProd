const button = document.getElementById('button');
const name = document.getElementById('name');
const image = document.getElementById('image');
const price = document.getElementById('price');
const description = document.getElementById('description');
const styleId = document.getElementById('style_id');
button.onclick = function ()
{
    console.log(name.value + ' ' + image.value + ' ' + price.value + ' ' + description.value + ' ' + styleId.value);
    const data = {
        name: name.value,
        image: image.value,
        price: price.value,
        description: description.value,
        style_id: styleId.value,
    };

    $.ajax({
        type: "POST",
        url: '/products',
        data: data,
        success: function(response)
        {
            response = JSON.parse(response);
            console.log(response);
        },
        error: function() { }
    });
}