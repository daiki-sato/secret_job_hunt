import { useForm, Controller } from "react-hook-form";
import React, { useState} from "react";
import { TextField, Button, Typography, Grid, Box} from "@material-ui/core/";

const ListItems = (props) => (
    <Box
    sx={{
        p: 2,
        display: "flex",
        mb: 3,
    }}
    >
        <Typography>{props.sex}/</Typography>
        <Typography>{props.company}/</Typography>
        <Typography>{props.department}/</Typography>
        <Typography>{props.working_period}年/</Typography>
    </Box>
);

function Basic(props) {
    const { control, handleSubmit } = useForm({
    defaultValues: {
        checkBox: false,
        textBox: "",
        pullDown: "",
    },
    });
    const onSubmit = () => {
    props.handleNext();
    };
    const [companyKeyword, setCompanyKeyword] = useState("");
    const [departmentKeyword, setDepartmentKeyword] = useState("");
    const [users, setUsers] = useState([]);
    const getData = () => {
    axios
        .get(
        `http://localhost/search/getUser/${companyKeyword}/${departmentKeyword}`
        )
        .then((response) => setUsers(response.data))
        .catch((error) => console.log(error));
    };
    return (
    <Grid item={true} container>
        <Grid item={true} sm={2} />
        <Grid item={true} lg={8} sm={8}>
        <form onSubmit={handleSubmit(onSubmit)}>
            <Box sx={{ display: "flex" }}>
            <TextField
                id="outlined-basic"
                label="会社"
                variant="outlined"
                onChange={(e) => setCompanyKeyword(e.target.value)}
            />
            <Box>✕</Box>
            <TextField
                id="outlined-basic"
                label="部署"
                variant="outlined"
                onChange={(e) => setDepartmentKeyword(e.target.value)}
            />
            </Box>
        </form>
        {users.map((v, i) => (
            <ListItems
            key={i}
            department={v.department}
            sex={v.sex}
            company={v.company}
            working_period={v.working_period}
            />
        ))}
        <Box sx={{ mx: "auto", width: 200, m: 2 }}>
            <Button variant="contained" color="primary" onClick={getData}>
            この条件で検索する
            </Button>
        </Box>
        </Grid>
    </Grid>
    );
}

export default Basic;
