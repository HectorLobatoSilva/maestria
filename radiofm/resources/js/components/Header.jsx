import React from 'react'
import { Link } from 'react-router-dom';
import { makeStyles } from '@material-ui/core/styles'
import { AppBar, Toolbar, IconButton, Typography, Button } from '@material-ui/core'
import MenuIcon from '@material-ui/icons/Menu'
import { green } from '@material-ui/core/colors'

const useStyles = makeStyles( theme => ( {
    menuButton: {
        marginRight: theme.spacing(2)
    },
    title:{
        flexGrow: 1,
        color: '#FFFFFF',
        textDecoration: 'none'
    },
    loginButton:{
        backgroundColor: green[500],
        '&:hover':{
            backgroundColor: green[700]
        }
    }
}) )

const Header = () => {
    const classes = useStyles()
    return (
        <AppBar position = "static">
            <Toolbar>
                <IconButton edge = "start" color = "inherit" aria-label = "menu" className = { classes.menuButton } >
                    <MenuIcon/>
                </IconButton>
                <Link to = "/" className = { classes.title } >
                    <Typography variant = "h6" > Post's </Typography>
                </Link>
                <Link to = "/login">
                    <Button variant = "contained" color = "primary" className = { classes.loginButton } > Login </Button>
                </Link><p>&nbsp;</p>
                <Link to = "/user">
                    <Button variant = "contained" color = "primary" className = { classes.loginButton } > Registro </Button>
                </Link>
            </Toolbar>
        </AppBar>
    )
}

export default Header