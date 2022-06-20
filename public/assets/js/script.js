document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;

  if ("IntersectionObserver" in window) {
      lazyloadImages = document.querySelectorAll(".lazy");
      var imageObserver = new IntersectionObserver(function(entries, observer) {
          entries.forEach(function(entry) {
              if (entry.isIntersecting) {
                  var image = entry.target;
                  image.src = image.dataset.src;
                  image.classList.remove("lazy");
                  imageObserver.unobserve(image);
              }
          });
      });

      lazyloadImages.forEach(function(image) {
          imageObserver.observe(image);
      });
  } else {
      var lazyloadThrottleTimeout;
      lazyloadImages = document.querySelectorAll(".lazy");

      function lazyload() {
          if (lazyloadThrottleTimeout) {
              clearTimeout(lazyloadThrottleTimeout);
          }

          lazyloadThrottleTimeout = setTimeout(function() {
              var scrollTop = window.pageYOffset;
              lazyloadImages.forEach(function(img) {
                  if (img.offsetTop < (window.innerHeight + scrollTop)) {
                      img.src = img.dataset.src;
                      img.classList.remove('lazy');
                  }
              });
              if (lazyloadImages.length == 0) {
                  document.removeEventListener("scroll", lazyload);
                  window.removeEventListener("resize", lazyload);
                  window.removeEventListener("orientationChange", lazyload);
              }
          }, 20);
      }

      document.addEventListener("scroll", lazyload);
      window.addEventListener("resize", lazyload);
      window.addEventListener("orientationChange", lazyload);
  }
})
        $("img").click(function() {
            var t = $(this).attr("src");
            var index = $(this).attr('data-id');
            window.history.replaceState(null, null, "?id="+index+"");
            document.getElementById("btnCollaps").href = "#collapse"+index; 
            $('#index').append(index);
            $(".modal-detail-body").html("<img src='" + t + "' class='modal-img'>");
            $("#modal1").modal("show");
        });