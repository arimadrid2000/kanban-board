export const setUser = ( state, data ) => {
    state.currentUser = data.user;
    state.accessToken = data.access_token;
    localStorage.setItem('user', JSON.stringify(state.currentUser))
    localStorage.setItem('token', JSON.stringify(state.accessToken))
}