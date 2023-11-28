import {parseResponse} from "./index.js";

async function create(data) {
    return parseResponse(axios.post('/api/users/', data));
}

async function update(id, data) {
    return parseResponse(axios.put(`/api/users/${id}`, data))
}

async function remove(id) {
    return parseResponse(axios.delete(`/api/users/${id}`));
}

async function get(id) {
    return parseResponse(axios.get(`/api/users/${id}`));
}

async function getUserName(id) {
    let res = await parseResponse(axios.get(`/api/users/${id}`));
    console.log(res?.data?.name);
    return res?.data?.name ?? '';
}

async function getAll() {
    return parseResponse(axios.get('/api/users'));
}

export default {
    getAll,
    create,
    get,
    update,
    remove,
    getUserName
}
