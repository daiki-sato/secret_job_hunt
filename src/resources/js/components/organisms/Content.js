import React, { useState, useEffect } from "react";
import { Grid } from "@material-ui/core";
import Stepper from "@material-ui/core/Stepper";
import Step from "@material-ui/core/Step";
import StepLabel from "@material-ui/core/StepLabel";
import Button from "@material-ui/core/Button";
import Typography from "@material-ui/core/Typography";
import Basic from "./Basic";
import Optional from "./Optional";
import Confirm from "./Confirm";
import Thanks from "../Thanks";

export const UserInputDataContext = React.createContext();
export const userIdContext = React.createContext();

const Content = () => {
  /***************************
  user_id取得
  ***************************/
  const targetDom = document.getElementById("search");
  const userId = targetDom.dataset.userId;

  const [currentState, setCurrentState] = useState({});
  const value = {
    currentState,
    setCurrentState,
  };
  const getSteps = () => {
    return ["条件入力", "面談希望日入力", "面談希望日送信"];
  };

  const getStepContent = (stepIndex) => {
    switch (stepIndex) {
      case 0:
        return <Basic handleNext={handleNext} />;
      case 1:
        return <Optional handleNext={handleNext} handleBack={handleBack} />;
      case 2:
        return <Confirm handleNext={handleNext} handleBack={handleBack} />;
      default:
        return "Unknown stepIndex";
    }
  };

  const [activeStep, setActiveStep] = React.useState(0);
  const steps = getSteps();
  const handleNext = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
  };
  const handleBack = () => {
    setActiveStep((prevActiveStep) => prevActiveStep - 1);
  };
  const handleReset = () => {
    setActiveStep(0);
  };

  return (
    <Grid item={true} container>
      <Grid item={true} sm={2} />
      <Grid item={true} lg={8} sm={8}>
        <Stepper activeStep={activeStep} alternativeLabel>
          {steps.map((label) => (
            <Step key={label}>
              <StepLabel>{label}</StepLabel>
            </Step>
          ))}
        </Stepper>
        {/* {activeStep === steps.length ? (
          <div>
            <Typography>全ステップの表示を完了</Typography>
            <Button onClick={handleReset}>リセット</Button>
          </div>
        ) : (
          <div>
            <div>
              {activeStep === steps.length ? (
                <Thanks />
              ) : (
                <UserInputDataContext.Provider value={value}>
                  {getStepContent(activeStep, handleNext, handleBack)}
                </UserInputDataContext.Provider>
              )}
            </div>
            activeStep:{activeStep}
            <Button disabled={activeStep === 0} onClick={handleBack}>
              戻る
            </Button>
            <Button variant="contained" color="primary" onClick={handleNext}>
              {activeStep === steps.length - 1 ? "送信" : "次へ"}
            </Button>
          </div>
        )} */}
        {activeStep === steps.length ? (
          <Thanks />
        ) : (
          <UserInputDataContext.Provider value={value}>
            <userIdContext.Provider value={userId}>
              {getStepContent(activeStep, handleNext, handleBack)}
            </userIdContext.Provider>
          </UserInputDataContext.Provider>
        )}
      </Grid>
    </Grid>
  );
};

export default Content;
