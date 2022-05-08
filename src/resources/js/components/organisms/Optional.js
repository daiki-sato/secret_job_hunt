import React, { useState , useContext} from "react";
import { Grid } from '@material-ui/core'
import { useForm, Controller } from "react-hook-form";
import TextField from "@material-ui/core/TextField";
import { Button } from "@material-ui/core";
import Tooltip from '@material-ui/core/Tooltip';

import { UserInputDataContext } from "./Content";

function Optional(props) {
    const { control, handleSubmit, getValues } = useForm({
        defaultValues: {
            startDate: "",
            endDate: "",
        },
    });

    const { currentState, setCurrentState } = useContext(UserInputDataContext);
    const onSubmit = (action) => {
        if(action === 'back') {
            props.handleBack();
        } else if (action === 'next') {
            props.handleNext();
        }
        const data = getValues();
        setCurrentState({...currentState, "interviewTimes": data });
    };
    return (
        <Grid item={true} container>
            <Grid item={true} sm={2}/>
            <Grid item={true} lg={8} sm={8}>
                <form onSubmit={handleSubmit(onSubmit)}>
                    <Controller
                        control={control}
                        name="startDate"
                        render={({ field }) => (
                            <Tooltip
                                title="開始日"
                                placement="top-start"
                                arrow
                            >
                                <TextField
                                    {...field}
                                    label="開始日"
                                    fullWidth
                                    margin="normal"
                                    minRows={1}
                                    multiline
                                    variant="outlined"
                                    placeholder="開始日"
                                />
                            </Tooltip>
                        )}
                    />
                    <Controller
                        control={control}
                        name="endDate"
                        render={({ field }) => (
                            <Tooltip
                                title="終了日"
                                placement="top-start"
                                arrow
                            >
                                <TextField
                                    {...field}
                                    label="終了日"
                                    fullWidth
                                    margin="normal"
                                    minRows={1}
                                    multiline
                                    variant="outlined"
                                    placeholder="終了日"
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