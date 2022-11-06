var subjectObject = {
    "Dhaka": {
      "Gulshan": [],
      "Banani": [],
      "Mirpur": [],
      "Kafrul": [],
      "Mohakhali": [],  
    },
    "Khulna": {
     "Khulna": [],  
    },
    "Cumilla": {
     "Cumilla": [],  
    },
    "Kushtia": {
     "Kushtia": [],  
    },
    "Barishal": {
     "Barishal": [],  
    },
    "Feni": {
     "Feni": [],  
    }
  }
  window.onload = function() {
    var subjectSel = document.getElementById("subject");
    var topicSel = document.getElementById("topic");
  
    for (var x in subjectObject) {
      subjectSel.options[subjectSel.options.length] = new Option(x, x);
    }
    subjectSel.onchange = function() {
      //empty Chapters- and Topics- dropdowns
  
      topicSel.length = 1;
      //display correct values
      for (var y in subjectObject[this.value]) {
        topicSel.options[topicSel.options.length] = new Option(y, y);
      }
    }
    topicSel.onchange = function() {
      //empty Chapters dropdown
      chapterSel.length = 1;
      //display correct values
      var z = subjectObject[subjectSel.value][this.value];
      for (var i = 0; i < z.length; i++) {
        chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
      }
    }
  }



  var searchFilter = () => {
    let selectedColor = document.getElementById("filterByColor").value;
    const input = document.querySelector(".form-control");
    let textBox= input.value;
    const cards = document.getElementsByClassName("col-lg-4");
    for (let i = 0; i < cards.length; i++) {
      let title = cards[i].querySelector(".dart-box");
      if ((cards[i].classList.contains(selectedColor) || selectedColor=="") && title.innerText.toLowerCase().indexOf(textBox.toLowerCase()) > -1) {
        cards[i].classList.remove("d-none");
      } else {
        cards[i].classList.add("d-none");
      }
    }
  }


