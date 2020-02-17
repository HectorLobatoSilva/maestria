import React from 'react'
import { TextField } from '@material-ui/core'

const MyText = ( { type, id, label, placeholder, error, icon, multiline, noFullWith } ) => {
    return <TextField 
        type = { type }
        id = { id } 
        label = { label } 
        placeholder = { placeholder }
        fullWidth = { noFullWith ? false : true }
        multiline = { multiline ? multiline : false }
        rows = { multiline ? 4 :  1 }
        color = "primary"
        error = { error }
        margin = "normal" 
        InputLabelProps = { { shrink: true } } 
        InputProps = { { startAdornment: icon } }
        variant ="outlined"
    />
}

export default MyText