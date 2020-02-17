import React from 'react'

import StarBorderOutlinedIcon from '@material-ui/icons/StarBorderOutlined';
import ExplicitOutlinedIcon from '@material-ui/icons/ExplicitOutlined';
import { Box, Container, Button } from '@material-ui/core';
import SaveIcon from '@material-ui/icons/Save';

import MyText from '../MyText'

const AddPost = () => {
    return (
        <Box boxShadow = { 3 } bgcolor = "background.paper" margin = "normal" textAlign = "center" >
            <h1 margin = "normal" > Agregar post </h1>
            <Container>
                <MyText type = "text" id = "title" label = "Titulo" placeholder = "Titulo" error = { false } icon = { <StarBorderOutlinedIcon/> } />
                <MyText type = "text" id = "text" label = "Contenido" placeholder = "Contenido" error = { false } icon = { <ExplicitOutlinedIcon/> } multiline />
                <Button variant = "contained" color = "primary" size = "large" startIcon = { <SaveIcon/> } fullWidth  > Agregar </Button>
                <p>&nbsp;</p>
            </Container>
        </Box>
    )
}

export default AddPost