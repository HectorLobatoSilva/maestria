import React from 'react'
import { Box, Container, Button, } from '@material-ui/core'
import EmailOutlinedIcon from '@material-ui/icons/EmailOutlined';
import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import PersonAddOutlinedIcon from '@material-ui/icons/PersonAddOutlined';
import FaceOutlinedIcon from '@material-ui/icons/FaceOutlined';
import SaveIcon from '@material-ui/icons/Save';
import MyText from '../MyText';

const User = () => {
    return (
        <Box boxShadow = { 3 } bgcolor = "background.paper" margin = "normal" textAlign = "center" >
            <h1 margin = "normal" > Registro de usuario </h1>
            <Container>
                <MyText type = "email" id = "email" label = "Correo electronico" placeholder = "Correo electronico" error = { false } icon = { <EmailOutlinedIcon/> } />
                <MyText type = "text" id = "username" label = "Nombre de usuario" placeholder = "Nombre de usuario" error = { false } icon = { <PersonAddOutlinedIcon/> } />
                
                <MyText type = "text" id = "nombre" label = "Nombre" placeholder = "Nombre" error = { false } icon = { <FaceOutlinedIcon/> } />
                <MyText type = "text" id = "apellidos" label = "Apellidos" placeholder = "Apellidos" error = { false } icon = { <FaceOutlinedIcon/> } />
                <MyText type = "password" id = "passwrod" label = "Contraseña" placeholder = "Contraseña" error = { false } icon = { <LockOutlinedIcon/> } />
                <Button variant = "contained" color = "primary" size = "large" startIcon = { <SaveIcon/> } fullWidth  > Agregar </Button>
                <p>&nbsp;</p>
            </Container>
        </Box>
    )
}

export default User