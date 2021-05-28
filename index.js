window.onload = () => {
  fetch("http://httpbin.org/delay/5")
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      return fetch(
        "http://httpbin.org/base64/VGhpcyB1c2VkIHRvIGJlIGVuY29kZWQuIE5vdCBhbnltb3JlIQ=="
      );
    })
    .then((response) => response.text())
    .then((data) => (document.getElementById("text").innerHTML = data))
    .catch((err) => console.log(err));

  fetch("server.php")
    .then((response) => response.text())
    .then((data) => {
      const jsonData = JSON.parse(data);
      const table = document.createElement("table");

      // header names
      const cols = [];
      for (const header in jsonData[0]) {
        cols.push(header);
      }
      cols.pop();

      // header row
      const tr = table.insertRow(-1);
      for (let i = 0; i < cols.length; i++) {
        let theader = document.createElement("th");
        theader.innerHTML = cols[i];
        tr.appendChild(theader);
      }
      // value rows
      for (let i = 0; i < jsonData.length; i++) {
        let trow = table.insertRow(-1);
        for (let j = 0; j < cols.length; j++) {
          let cell = trow.insertCell(-1);
          cell.innerHTML = jsonData[i][cols[j]];
        }
      }
      document.getElementById("table").appendChild(table);
    })
    .catch((err) => console.log(err));
};
