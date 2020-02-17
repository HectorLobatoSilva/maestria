import React from 'react'
import { useParams } from 'react-router-dom'
import { Box, Container, Typography, Avatar, Chip } from '@material-ui/core'

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

const Post = () => {
    const { id } = useParams()
    return (
        <Box boxShadow = { 3 } bgcolor = "background.paper" margin = "normal" >
            <h1 margin = "normal" > { posts[0].title } </h1>
            <Container>
                {/* <Typography> <Avatar> { posts[0].user.charAt(0) } </Avatar> { posts[0].user } - { posts[0].updated_at } </Typography> */}
                <Chip size = "small" variant = "outlined" avatar = { <Avatar> { posts[0].user.charAt(0) } </Avatar> } label = { `${ posts[0].user } - ${ posts[0].updated_at }` } />
                <Typography> { posts[0].text } </Typography>
                <p>&nbsp;</p>
            </Container>
        </Box>
    )
}

export default Post