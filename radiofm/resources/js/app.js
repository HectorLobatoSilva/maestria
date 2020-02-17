import React, { Component } from 'react'
import ReactDom from 'react-dom'
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom'
import Header from './components/Header'
import { CssBaseline, Container } from '@material-ui/core'
import Posts from './components/Posts'
import User from './components/user/User.'
import AddPost from './components/Posts/AddPost'
import Login from './components/Login'
import Post from './components/Post'

const posts = [
    {
        id: 1,
        user: 'Hector99',
        title: 'Aprende a programar',
        text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        updated_at: '12/01/2020'
    },
    {
        id: 2,
        user: 'Juenito',
        title: 'El arte de la cocina',
        text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        updated_at: '12/01/2001'
    },
]

class App extends Component {
    render(){
        return (
            <Router>
                <CssBaseline/>
                <Header/>
                <Container fixed> 
                    <Switch>
                        <Route exact path = "/" > <Posts posts = { posts } />  </Route>
                        <Route exact path = "/user"> <User/> </Route>
                        <Route exact path = "/AddPost"> <AddPost/> </Route>
                        <Route exact path = "/login"> <Login/> </Route>
                        <Route path = "/post/:id"> <Post/> </Route>
                    </Switch>
                
                </Container>
            </Router>
        )
    }
}

ReactDom.render(<App/>, document.getElementById('app'))