const connection = require('./db');

/**
 * @param {string} nama 
 * @param {string} nim 
 * @param {string} jurusan 
 * @param {string} email
 * @param {function} callback 
 */
function createMahasiswa(nama, nim, jurusan, email, callback) {
    const query = 'INSERT INTO mahasiswa (nama, nim, jurusan, email) VALUES (?, ?, ?, ?)';
    connection.query(query, [nama, nim, jurusan, email], (error, results) => {
        if (error) {
            return callback(error, null);
        }
        callback(null, results);
    });
}

/**
 * @param {function} callback 
 */
function getAllMahasiswa(callback) {
    const query = 'SELECT * FROM mahasiswa ORDER BY id DESC';
    connection.query(query, (error, results) => {
        if (error) {
            return callback(error, null);
        }
        callback(null, results);
    });
}

/**
 * @param {number} id 
 * @param {function} callback 
 */
function getMahasiswaById(id, callback) {
    const query = 'SELECT * FROM mahasiswa WHERE id = ?';
    connection.query(query, [id], (error, results) => {
        if (error) {
            return callback(error, null);
        }
        callback(null, results[0] || null);
    });
}

/**
 * @param {number} id 
 * @param {string} nama 
 * @param {string} nim 
 * @param {string} jurusan 
 * @param {string} email
 * @param {function} callback - Callback function (error, results)
 */
function updateMahasiswa(id, nama, nim, jurusan, email, callback) {
    const query = 'UPDATE mahasiswa SET nama = ?, nim = ?, jurusan = ?, email = ? WHERE id = ?';
    connection.query(query, [nama, nim, jurusan, email, id], (error, results) => {
        if (error) {
            return callback(error, null);
        }
        if (results.affectedRows === 0) {
            return callback(new Error('Data tidak ditemukan'), null);
        }
        callback(null, results);
    });
}

/**
 * @param {number} id 
 * @param {function} callback 
 */
function deleteMahasiswa(id, callback) {
    const query = 'DELETE FROM mahasiswa WHERE id = ?';
    connection.query(query, [id], (error, results) => {
        if (error) {
            return callback(error, null);
        }
        if (results.affectedRows === 0) {
            return callback(new Error('Data tidak ditemukan'), null);
        }
        callback(null, results);
    });
}

module.exports = {
    createMahasiswa,
    getAllMahasiswa,
    getMahasiswaById,
    updateMahasiswa,
    deleteMahasiswa
};
