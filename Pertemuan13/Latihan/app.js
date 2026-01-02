const express = require('express');
const path = require('path');
const dbOperations = require('./crud');

const app = express();
const PORT = 3000;

app.use(express.json());

app.use(express.static(path.join(__dirname, 'public')));

app.get('/api/mahasiswa', (req, res) => {
    dbOperations.getAllMahasiswa((error, data) => {
        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal mengambil data mahasiswa',
                error: error.message
            });
        }
        res.json({
            success: true,
            message: 'Data berhasil diambil',
            data: data
        });
    });
});

app.get('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    dbOperations.getMahasiswaById(id, (error, data) => {
        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal mengambil data mahasiswa',
                error: error.message
            });
        }
        if (!data) {
            return res.status(404).json({
                success: false,
                message: 'Data mahasiswa tidak ditemukan'
            });
        }
        res.json({
            success: true,
            message: 'Data berhasil diambil',
            data: data
        });
    });
});

app.post('/api/mahasiswa', (req, res) => {
    const { nama, nim, jurusan, email } = req.body;

    if (!nama || !nim || !jurusan || !email) {
        return res.status(400).json({
            success: false,
            message: 'Semua field harus diisi (nama, nim, jurusan, email)'
        });
    }

    dbOperations.createMahasiswa(nama, nim, jurusan, email, (error, result) => {
        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal menambahkan data mahasiswa',
                error: error.message
            });
        }
        res.status(201).json({
            success: true,
            message: 'Data mahasiswa berhasil ditambahkan',
            data: { id: result.insertId, nama, nim, jurusan, email }
        });
    });
});

app.put('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    const { nama, nim, jurusan, email } = req.body;

    if (!nama || !nim || !jurusan || !email) {
        return res.status(400).json({
            success: false,
            message: 'Semua field harus diisi (nama, nim, jurusan, email)'
        });
    }

    dbOperations.updateMahasiswa(id, nama, nim, jurusan, email, (error, result) => {
        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal memperbarui data mahasiswa',
                error: error.message
            });
        }
        res.json({
            success: true,
            message: 'Data mahasiswa berhasil diperbarui',
            data: { id: parseInt(id), nama, nim, jurusan, email }
        });
    });
});

app.delete('/api/mahasiswa/:id', (req, res) => {
    const { id } = req.params;
    dbOperations.deleteMahasiswa(id, (error, result) => {
        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal menghapus data mahasiswa',
                error: error.message
            });
        }
        res.json({
            success: true,
            message: 'Data mahasiswa berhasil dihapus'
        });
    });
});

app.listen(PORT, () => {
    console.log('============================================');
    console.log('  Aplikasi Pengelolaan Data Mahasiswa');
    console.log('============================================');
    console.log(`🚀 Server running on http://localhost:${PORT}`);
    console.log(`📄 Open browser: http://localhost:${PORT}`);
    console.log('============================================');
});
