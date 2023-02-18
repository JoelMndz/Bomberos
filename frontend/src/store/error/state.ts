export interface IErrorState {
  error?: {
    message?: string
  };
}

export function state(): IErrorState{
  return {
      error: {}
  }
}
