const { default: server } = require("./server");

const getClasses = () => axios.get(server.domain() + "/m_h_classes")
    .then(data => console.log(data));

const addtStudent = (credentials) => axios.post(server.domain() + "/m_h_users", credentials)
    .then(data => data);

export default {
    getClasses,
    addtStudent
}