import React, { Fragment } from 'react'
import { List, ListItem, ListItemText, Divider, Avatar, ListItemAvatar, ListItemSecondaryAction, IconButton } from '@material-ui/core'
import DeleteIcon from '@material-ui/icons/Delete';
import EditIcon from '@material-ui/icons/Edit';
import { Link } from 'react-router-dom';

const Posts = ( { posts } ) => {
    return <List component = "nav" dense = { true } >
        {
            posts.map( post => <Fragment key = { post.id } >
                    <Post key = { post.id } post = { post } />
                <Divider/>
            </Fragment>)
        }
    </List>
}

const Post = ( { post } ) => {
    return <ListItem button alignItems="flex-start">
        <ListItemAvatar>
            {
                post.avatar ? <Avatar src = { post.avatar } /> : <Avatar> { post.user.charAt(0) } </Avatar>
            }
        </ListItemAvatar>
        <Link to = {`/post/${post.id}`} style={{ textDecoration: 'none' }} >
            <ListItemText primary = { post.title } secondary = { post.updated_at } />
        </Link>
        <ListItemSecondaryAction>
            {/* <Button variant = "contained" color = "secondary" startIcon = { <DeleteIcon/> } > Eliminar </Button> */}
            <IconButton color = "primary"> <EditIcon/> </IconButton>
            <IconButton color = "secondary"> <DeleteIcon/> </IconButton>
        </ListItemSecondaryAction>
    </ListItem>
}

export default Posts