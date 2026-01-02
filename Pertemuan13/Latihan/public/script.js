const API_URL = '/api/mahasiswa';

const elements = {
    form: document.getElementById('mahasiswaForm'),
    formTitle: document.getElementById('formTitle'),
    submitBtn: document.getElementById('submitBtn'),
    cancelBtn: document.getElementById('cancelBtn'),
    refreshBtn: document.getElementById('refreshBtn'),
    tableBody: document.getElementById('tableBody'),
    emptyState: document.getElementById('emptyState'),
    loadingState: document.getElementById('loadingState'),
    toastContainer: document.getElementById('toastContainer'),
    modalOverlay: document.getElementById('modalOverlay'),
    modalTitle: document.getElementById('modalTitle'),
    modalMessage: document.getElementById('modalMessage'),
    modalConfirm: document.getElementById('modalConfirm'),
    modalCancel: document.getElementById('modalCancel'),
    mahasiswaId: document.getElementById('mahasiswaId'),
    nama: document.getElementById('nama'),
    nim: document.getElementById('nim'),
    jurusan: document.getElementById('jurusan'),
    email: document.getElementById('email')
};

let isEditMode = false;
let deleteId = null;

/**
 * @param {string} message 
 * @param {string} type 
 */
function showToast(message, type = 'success') {
    const icons = {
        success: '✅',
        error: '❌',
        warning: '⚠️'
    };

    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
        <span class="toast-icon">${icons[type]}</span>
        <span class="toast-message">${message}</span>
        <button class="toast-close" onclick="this.parentElement.remove()">×</button>
    `;

    elements.toastContainer.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'slideOut 300ms ease forwards';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

/**
 * @param {boolean} show 
 */
function toggleLoading(show) {
    elements.loadingState.style.display = show ? 'block' : 'none';
    elements.tableBody.parentElement.style.display = show ? 'none' : 'table';
}

/**
 * @param {boolean} show 
 */
function toggleEmptyState(show) {
    elements.emptyState.style.display = show ? 'block' : 'none';
    elements.tableBody.parentElement.style.display = show ? 'none' : 'table';
}

/**
 * @param {Object} data 
 */
function resetForm() {
    elements.form.reset();
    elements.mahasiswaId.value = '';
    isEditMode = false;
    elements.formTitle.innerHTML = '<span class="icon">➕</span> Tambah Mahasiswa Baru';
    elements.submitBtn.innerHTML = '<span class="btn-icon">💾</span> Simpan Data';
    elements.cancelBtn.style.display = 'none';
}

/**
 * @param {Object} data 
 */
function setEditMode(data) {
    isEditMode = true;
    elements.mahasiswaId.value = data.id;
    elements.nama.value = data.nama;
    elements.nim.value = data.nim;
    elements.jurusan.value = data.jurusan;
    elements.email.value = data.email;

    elements.formTitle.innerHTML = '<span class="icon">✏️</span> Edit Data Mahasiswa';
    elements.submitBtn.innerHTML = '<span class="btn-icon">💾</span> Update Data';
    elements.cancelBtn.style.display = 'inline-flex';

    elements.form.scrollIntoView({ behavior: 'smooth' });
}

/**
 * @param {string} title 
 * @param {string} message
 * @param {function} onConfirm
 */
function showModal(title, message, onConfirm) {
    elements.modalTitle.textContent = title;
    elements.modalMessage.textContent = message;
    elements.modalOverlay.classList.add('active');

    elements.modalConfirm.onclick = () => {
        hideModal();
        onConfirm();
    };
}

function hideModal() {
    elements.modalOverlay.classList.remove('active');
}

async function fetchMahasiswa() {
    toggleLoading(true);

    try {
        const response = await fetch(API_URL);
        const result = await response.json();

        if (result.success) {
            renderTable(result.data);
        } else {
            showToast(result.message || 'Gagal mengambil data', 'error');
        }
    } catch (error) {
        console.error('Fetch error:', error);
        showToast('Gagal terhubung ke server', 'error');
    } finally {
        toggleLoading(false);
    }
}

/**
 * @param {Object} data 
 */
async function createMahasiswa(data) {
    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
            showToast('Data mahasiswa berhasil ditambahkan', 'success');
            resetForm();
            fetchMahasiswa();
        } else {
            showToast(result.message || 'Gagal menambahkan data', 'error');
        }
    } catch (error) {
        console.error('Create error:', error);
        showToast('Gagal terhubung ke server', 'error');
    }
}

/**
 * @param {number} id 
 * @param {Object} data 
 */
async function updateMahasiswa(id, data) {
    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
            showToast('Data mahasiswa berhasil diperbarui', 'success');
            resetForm();
            fetchMahasiswa();
        } else {
            showToast(result.message || 'Gagal memperbarui data', 'error');
        }
    } catch (error) {
        console.error('Update error:', error);
        showToast('Gagal terhubung ke server', 'error');
    }
}

/**
 * @param {number} id 
 */
async function deleteMahasiswa(id) {
    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: 'DELETE'
        });

        const result = await response.json();

        if (result.success) {
            showToast('Data mahasiswa berhasil dihapus', 'success');
            fetchMahasiswa();
        } else {
            showToast(result.message || 'Gagal menghapus data', 'error');
        }
    } catch (error) {
        console.error('Delete error:', error);
        showToast('Gagal terhubung ke server', 'error');
    }
}

/**
 * @param {Array} data 
 */
function renderTable(data) {
    if (data.length === 0) {
        toggleEmptyState(true);
        return;
    }

    toggleEmptyState(false);

    elements.tableBody.innerHTML = data.map((mhs, index) => `
        <tr>
            <td>${index + 1}</td>
            <td>${escapeHtml(mhs.nama)}</td>
            <td>${escapeHtml(mhs.nim)}</td>
            <td>${escapeHtml(mhs.jurusan)}</td>
            <td>${escapeHtml(mhs.email)}</td>
            <td>
                <div class="action-buttons">
                    <button class="btn btn-success btn-sm" onclick='handleEdit(${JSON.stringify(mhs)})'>
                        ✏️ Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="handleDelete(${mhs.id}, '${escapeHtml(mhs.nama)}')">
                        🗑️ Hapus
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

/**
 * @param {string} text 
 */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function handleSubmit(e) {
    e.preventDefault();

    const data = {
        nama: elements.nama.value.trim(),
        nim: elements.nim.value.trim(),
        jurusan: elements.jurusan.value.trim(),
        email: elements.email.value.trim()
    };

    if (!data.nama || !data.nim || !data.jurusan || !data.email) {
        showToast('Semua field harus diisi', 'warning');
        return;
    }

    if (isEditMode) {
        const id = elements.mahasiswaId.value;
        updateMahasiswa(id, data);
    } else {
        createMahasiswa(data);
    }
}

function handleEdit(data) {
    setEditMode(data);
}

/**
 * @param {number} id -
 * @param {string} nama 
 */
function handleDelete(id, nama) {
    showModal(
        'Konfirmasi Hapus',
        `Apakah Anda yakin ingin menghapus data "${nama}"?`,
        () => deleteMahasiswa(id)
    );
}

elements.form.addEventListener('submit', handleSubmit);
elements.cancelBtn.addEventListener('click', resetForm);
elements.refreshBtn.addEventListener('click', fetchMahasiswa);
elements.modalCancel.addEventListener('click', hideModal);
elements.modalOverlay.addEventListener('click', (e) => {
    if (e.target === elements.modalOverlay) {
        hideModal();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    fetchMahasiswa();
});
