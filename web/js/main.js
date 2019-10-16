(function() {
  var thumbs = document.querySelectorAll(".carousel-inner img"),
    image = document.querySelector(".view-product img"),
    count = thumbs.length,
    current = 0;

  // управление кликами по превью фото
  [].forEach.call(thumbs, function(thumb, n) {
    thumb.index = n;
    thumb.addEventListener("click", function() {
      showPhoto(thumb.index);
    });
  });

  // управление кликом по большой картинке
  // image.addEventListener('click', function() {
  //     showPhoto((current + 1) % count);
  // });

  // управление стрелками 'влево' и 'вправо'
  // document.addEventListener('keydown', function(e) {
  //     var keyCode = e.which;
  //     if (keyCode == 37) {
  //         showPhoto((count + current - 1) % count);
  //     } else if (keyCode == 39) {
  //         showPhoto((current + 1) % count);
  //     } else {
  //         return;
  //     }
  // });

  // управление колёсиком мыши
  // image.addEventListener('wheel', function(e) {
  //     if (e.deltaY > 0) {
  //         showPhoto((current + 1) % count);
  //     } else {
  //         showPhoto((count + current - 1) % count);
  //     }
  // });

  function showPhoto(index) {
    var src = thumbs[index].getAttribute("src");
    image.setAttribute("src", src.replace("photos", "photos"));
    current = index;
  }
})();

function showCart(cart) {
  $("#cart .modal-body").html(cart);
  $("#cart").modal();
}

function getPrint() {
  $.ajax({
    url: "/admin/print/show",
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showPrint(res);
    },
    error: function() {
      alert("Error!");
    }
  });
  return false;
}

$("#print .modal-body").on("click", ".del-item", function() {
  var id = $(this).data("id");
  // $('.check').removeClass('fa-check-circle-o').addClass('fa-circle-thin');
  $.ajax({
    url: "/admin/print/del-item",
    data: { id: id },
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showPrint(res);
    },
    error: function() {
      alert("Error!");
    }
  });
});

function showPrint(print) {
  $("#print .modal-body").html(print);
  $("#print").modal();
}

$(".print").on("click", function(e) {
  e.preventDefault();
  showPrint();
});

$(".check").on("click", function(e) {
  e.preventDefault();
  var send = true;
  $(this)
    .removeClass("fa-circle-thin")
    .addClass("fa-check-circle-o");

  var id = $(this).data("id"),
    qty = $("#qty").val();
  if (send === true) {
    $.ajax({
      url: "/admin/print/add",
      data: { id: id, qty: qty },
      type: "GET",
      success: function(res) {
        if (!res) alert("Ошибка!");
        showPrint(res);
      },
      error: function() {
        alert("Error!");
      }
    });
  } else {
    return false;
  }
});

function clearPrint() {
  $.ajax({
    url: "/admin/print/clear",
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showPrint(res);
    },
    error: function() {
      alert("Error!");
    }
  });
}

$(".filters").click(function() {
  $(".product-search").toggle();
});

// --------------------------------------

function Print(strid) {
  var prtContent = document.getElementById(strid);
  var WinPrint = window.open(
    "",
    "",
    "left=50,top=50,width=800,height=640,toolbar=0,scrollbars=0,status=0"
  );
  WinPrint.document.write("<hr>");
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.write("<hr>");
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
  prtContent.innerHTML = strOldOne;
}

$(".clear-print").on("click", function() {
  $(".check")
    .removeClass("fa-check-circle-o")
    .addClass("fa-circle-thin");
});

// $('.wrapper__index').bind('mousewheel', 'touchmove', function(event) {
//     if (event.originalEvent.wheelDelta >= 0) {
//         $('.nav').addClass('visibleNav').removeClass('invisibleNav');
//     } else {
//         $('.nav').addClass('invisibleNav').removeClass('visibleNav');
//     }
// });

$(".cart").on("click", function(e) {
  e.preventDefault();

  let id = $(this).data("id");

  $.ajax({
    url: "/cart/add",
    data: { id: id },
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showContactForm(res);
    },
    error: function() {
      alert("Error!");
    }
  });
});

function showContactForm(cart) {
  $("#contact__form .modal-body").html(cart);
  $("#contact__form").modal();
}

$("#contact__form .modal-body").on("click", ".del-item", function() {
  var id = $(this).data("id");
  // $('.check').removeClass('fa-check-circle-o').addClass('fa-circle-thin');
  $.ajax({
    url: "/cart/del-item",
    data: { id: id },
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showPrint(res);
    },
    error: function() {
      alert("Error!");
    }
  });
});

function clearCart() {
  $.ajax({
    url: "/cart/clear",
    type: "GET",
    success: function(res) {
      if (!res) alert("Ошибка!");
      showPrint(res);
    },
    error: function() {
      alert("Error!");
    }
  });
}
