/**
 * @author Richard Ciampa
 */

var titlePart = "Otter Express";

function uiClientForm(){
	
	var subBtn = document.createElement("button");
	var btnTxt = document.createTextNode("Get Orders");
	subBtn.appendChild(btnTxt);
	subBtn.addEventListener("click", function(){ getClientOrders(); });
	
	var inTxt = document.createElement("input");
	inTxt.setAttribute("id", "lastName");
	inTxt.setAttribute("type", "text");
	inTxt.setAttribute("placeholder", "last name");
	
	var div = document.createElement("div");
	div.setAttribute("id", "client-input");
	
	var dataDiv = document.createElement("div");
	dataDiv.setAttribute("id","data-client-orders");
	
	div.appendChild(inTxt);
	div.appendChild(subBtn);
	
	document.getElementById("data-content").innerHTML = "";
	document.getElementById("data-content").appendChild(div);
	document.getElementById("data-content").appendChild(dataDiv);
	
	document.getElementById("lastName").focus();
	
	document.getElementById('sql-statment').innerHTML = "SQL displayed after button clicked";
	
	document.title = titlePart + ": Client Orders";
}

function uiDashboardSql() {
	var sqlString = "";
	sqlString += "SELECT COUNT(\`orderId\`) AS \'OTD\'" + "\n" + "FROM \`oe_order\`";
	
	sqlString += "<hr/>";
	
	sqlString += "SELECT AVG(\`price\`) AS \'Average\'" +  "\n" + "FROM \`oe_product\`";
	
	sqlString += "<hr/>";
	
	sqlString += "SELECT AVG(p.price * op.qty) AS 'AOT' \n \
                  FROM `oe_orderProduct` op\n \
                  INNER JOIN `oe_product` p\n \
                  ON p.productId = op.productId";
    
    sqlString += "<hr/>";
    
    sqlString += "SELECT COUNT(`productId`) AS 'HIC' FROM\n \
	              `oe_product` WHERE `healthyChoice` = 1";
	              
	sqlString += "<hr/>";
	
	sqlString += "SELECT SUM(Sales) AS 'GSTD' FROM\n \
                  (SELECT SUM(qty * p.price) AS \'Sales\'\n \
                  FROM `oe_orderProduct` op\n \
                  RIGHT JOIN `oe_product` p\n \
                  ON op.productId = p.productId\n \
                  GROUP BY op.`productId`) salesTable";
	
	uiSetSqlStatment(sqlString);
	
	document.title = titlePart + ": Dashboard";
}

function uiClientsSql(){
	var sqlString = "SELECT c.otterId,\n \
                     c.firstName,\n \
                     c.lastName,\n \
                     c.phone,\n \
                     c.email,\n \
                     c.officeNumber,\n \
                     s.collegeName,\n \
                     b.buildingName,\n \
                     b.buildingNumber\n \
                     FROM `oe_client` c\n \
                     INNER JOIN `oe_building` b\n \
                     ON c.buildingId = b.buildingId\n \
                     INNER JOIN `oe_college` s\n \
                     ON c.collegeId = s.collegeId";
     
     uiSetSqlStatment(sqlString);
     
     document.title = titlePart + ": Client list";
}

function uiOrderHistorySql(){
	
	var sqlString = "SELECT c.firstName, c.lastName,\n \
                    c.email, c.phone,\n \
                    op.orderId, o.dateTime, o.timeRequested,\n \
                    p.productName, op.qty, p.price,\n \
                    p.price * op.qty AS \'Total\'\n \
                    FROM `oe_order` o\n \
                    INNER JOIN `oe_orderProduct` op\n \
                    ON o.orderId = op.orderId\n \
                    INNER JOIN `oe_client` c\n \
                    ON c.otterId = o.clientId\n \
                    INNER JOIN `oe_product` p\n \
                    ON p.productId = op.productId \n \
                    ORDER BY c.lastName";
    
    uiSetSqlStatment(sqlString);
    
    document.title = titlePart +  ": Order history";
}

function uiClientOrdersSql(){
	
	sqlString = "SELECT * FROM `oe_order` o \n \
	             INNER JOIN `oe_client` c\n \
	             ON c.otterId = o.clientId\n \
	             WHERE c.lastName = :client";
	
	uiSetSqlStatment(sqlString);
	
	document.title = titlePart + ": Clients orders";
}

function uiClientWithoutOrders(){
	
	sqlString = "SELECT c.otterId, c.firstName,\n \
                c.lastName, c.phone, c.email,\n \
                b.buildingName, b.buildingNumber\n \
                FROM `oe_client` c\n \
                LEFT JOIN `oe_order` o\n \
                ON c.otterId = o.clientId\n \
                INNER JOIN `oe_building` b\n \
                ON c.buildingId = b.buildingId\n \
                WHERE o.orderId IS NULL\n \
                ORDER BY c.lastName";
                
    uiSetSqlStatment(sqlString);
    
   document.title = titlePart + ": Clients without orders";
}

function uiProductVolume() {
	
  sqlString = "SELECT p.productId, p.productName, p.price,\n \
	   SUM(qty) AS 'qty', SUM(qty * p.price) AS 'Sales' \n \
	   FROM `oe_orderProduct` op\n \
       RIGHT JOIN `oe_product` p\n \
       ON op.productId = p.productId\n \
       GROUP BY `productId`\n \
       ORDER BY Sales DESC";
       
       uiSetSqlStatment(sqlString);
       
       document.title = titlePart + ": Sales volume by product";
}

/*
 * This is the call that updates the sql statment code in the UI,
 * it is called from each data access function
 */
function uiSetSqlStatment(sql) {
	document.getElementById('sql-statment').innerHTML = sql;
}