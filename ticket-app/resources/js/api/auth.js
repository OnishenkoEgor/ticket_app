async function getCurrentUser() {
    return axios.get('/api/current-user').then(({data}) => data);
}

async function login(loginData) {
    return axios.post('api/login', loginData).then(({data}) => data);
}

async function logout() {
    return axios('/api/logout').then(({data}) => data);
}

export default {
    login,
    logout,
    getCurrentUser
}
