$(document).ready(function () {
  //get the images
  let imageItems = $(".image-container").find("img");

  //preview when clicked
  imageItems.click(function () {
    //read the image url
    let imageUrl = $(this).attr("src");
    //create new image and added to preview
    let image = $("<img>").attr("src", imageUrl).css("width", "100%");
    //add the image to show image container
    $(".show-images").empty().append(image).fadeIn(200);
  });
  $(".show-images").click(function () {
    $(this).stop().fadeOut();
  });
});
