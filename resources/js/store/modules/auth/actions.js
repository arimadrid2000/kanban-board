export const createUser = async ({ commit }, data) => {
    const {statusText} = await axios.post('api/register', data)
    return statusText
}

export const login = async ({ commit }, form) => {
    const { data } = await axios.post('api/login', form)
    commit('setUser', data)
    return data
}