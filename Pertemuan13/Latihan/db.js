const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'akademik'
});

connection.connect(err => {
    if (err) {
        console.error('❌ Koneksi database gagal:', err.message);
        return;
    }
    console.log('✅ Database connected successfully!');
});

module.exports = connection;
