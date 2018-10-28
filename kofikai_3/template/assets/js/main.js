/*function createTable(data,type="show"){

    console.log(data.length);

    var container = document.getElementById("main-container");
    var tables = document.createElement("div");
    tables.classList.add("row");
    tables.classList.add("components");
    tables.setAttribute("id","tables");
    tables.style.display = "none";
    
    var wrapper,panel,panel_heading,panel_title,panel_body,card,card_body,card_title,card_text,btnOrder,btnPay,btnBook,btnCancel;
    for(var i = 0; i < data.length; i++){
        
        wrapper = document.createElement("div");
        wrapper.classList.add("col-md-3");

        
        panel = document.createElement("div");
        panel.classList.add("panel");
        panel.style.backgroundColor = "#beccce";
        
        panel_heading = document.createElement("div");
        panel_heading.classList.add("panel-heading");
        
        panel_title = document.createElement("h3");
        panel_title.classList.add("panel-title");
        panel_title.appendChild(document.createTextNode(data[i]['name']));

        panel_heading.appendChild(panel_title);
        panel.appendChild(panel_heading);

        panel_body = document.createElement("div");
        panel_body.classList.add("panel-body");

        card = document.createElement("div");
        card.classList.add("card");

        card_body = document.createElement("div");
        card_body.classList.add("card-body");

        card_title = document.createElement("h3");
        card_title.classList.add("card-title");
        card_title.appendChild(document.createTextNode(data[i]['status']));
        card_body.appendChild(card_title);

        card_text = document.createElement("p");
        card_text.classList.add("card-text");
        card_body.appendChild(card_text);

        if(data[i]['status'] == 'available'){

            card.style.backgroundColor = '##2cf765';

            btnOrder = document.createElement("div");
            btnOrder.classList.add("btn");
            btnOrder.classList.add("btn-primary");
            btnOrder.appendChild(document.createTextNode("Order"));
            card_body.appendChild(btnOrder);

            btnBook = document.createElement("div");
            btnBook.classList.add("btn");
            btnBook.classList.add("buttonTables");
            btnBook.classList.add("btn-warning");
            btnBook.appendChild(document.createTextNode("Book"));
            card_body.appendChild(btnBook);


        }else if(data[i]['status'] == 'active'){
            
            card.style.backgroundColor = '#ff2626';

            btnOrder = document.createElement("div");
            btnOrder.classList.add("btn");
            btnOrder.classList.add("btn-primary");
            btnOrder.appendChild(document.createTextNode("Order"));
            card_body.appendChild(btnOrder);

            btnPay = document.createElement("div");
            btnPay.classList.add("btn");
            btnPay.classList.add("buttonTables");
            btnPay.classList.add("btn-success");
            btnPay.appendChild(document.createTextNode("Pay"));
            card_body.appendChild(btnPay);


        }else if(data[i]['status'] == 'booked'){

            card.style.backgroundColor = '#f9c60c';

            btnOrder = document.createElement("div");
            btnOrder.classList.add("btn");
            btnOrder.classList.add("btn-primary");
            btnOrder.appendChild(document.createTextNode("Order"));
            card_body.appendChild(btnOrder);
           
           
            btnCancel = document.createElement("div");
            btnCancel.classList.add("btn");
            btnCancel.classList.add("buttonTables");
            btnCancel.classList.add("btn-danger");
            btnCancel.appendChild(document.createTextNode("Cancel"));
            card_body.appendChild(btnCancel);

        }
        
        

        card.appendChild(card_body);
        panel_body.appendChild(card);
        panel.appendChild(panel_body);
        wrapper.appendChild(panel);
        tables.appendChild(wrapper);
        container.appendChild(tables);

    }
}
*/
