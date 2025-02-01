const mysql = require('mysql');

const db = mysql.createConnection({
  host: "localhost",
  database: "latihan",
  port: "3360",
  user: "root",
  password: "",
});

db.connect((err) => {
  if (err) {
    console.error("Koneksi ke database gagal: ", err);
  } else {
    console.log("Terhubung ke database!");
  }
});

module.exports = db
