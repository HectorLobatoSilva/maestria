import React from 'react'
import EmailOutlinedIcon from '@material-ui/icons/EmailOutlined';
import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import { Box, Button, Container } from '@material-ui/core'
import MyText from '../MyText';

const Login = () => {
    return (
        <Box boxShadow = { 3 } bgcolor = "background.paper" margin = "normal" textAlign = "center" >
            <h1 margin = "normal" > Login </h1>
            <Container>
                <MyText type = "email" id = "email" label = "Correo electronico" placeholder = "Correo electronico" error = { false } icon = { <EmailOutlinedIcon/> } />
                <MyText type = "password" id = "passwrod" label = "Contraseña" placeholder = "Contraseña" error = { false } icon = { <LockOutlinedIcon/> } />
                <Button variant = "contained" color = "primary" size = "large" fullWidth  > Login </Button>
                <p>&nbsp;</p>
            </Container>
        </Box>
    )
}

export default Login