import React from "react";
import { Grid } from '@material-ui/core'
import { useForm, Controller } from "react-hook-form";
import TextField from "@material-ui/core/TextField";
import { Button } from "@material-ui/core";
import Tooltip from '@material-ui/core/Tooltip';

function Optional(props) {
    const { control, handleSubmit } = useForm({
        defaultValues: {
            multilineText: "",
        },
    });
    const onSubmit = (action) => {
        if(action === 'back') {
            props.handleBack();
        } else if (action === 'next') {
            props.handleNext();
        }
    };
    return (
        <Grid item={true} container>
            <Grid item={true} sm={2}/>
            <Grid item={true} lg={8} sm={8}>
                <form onSubmit={handleSubmit(onSubmit)}>
                    <Controller
                        control={control}
                        name="multilineText"
                        render={({ field }) => (
                            <Tooltip
                                title="自由に記入することができます"
                                placement="top-start"
                                arrow
                            >
                                <TextField
                                    {...field}
                                    label="備考欄"
                                    fullWidth
                                    margin="normal"
                                    rows={4}
                                    multiline
                                    variant="outlined"
                                    placeholder="その他ご要望等あれば、ご記入ください"
                                />
                            </Tooltip>
                        )}
                    />
                    <Button
                        variant="contained"
                        color="primary"
                        onClick={() => onSubmit("back")}
                    >
                        戻る
                    </Button>
                    <Button
                        variant="contained"
                        color="primary"
                        onClick={() => onSubmit("next")}
                    >
                        次へ
                    </Button>
                </form>
            </Grid>
        </Grid>
    )
}

export default Optional